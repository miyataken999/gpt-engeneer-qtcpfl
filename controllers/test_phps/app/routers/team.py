from fastapi import APIRouter, HTTPException
from sqlalchemy.orm import Session
from app.models.team import Team
from app.schemas.team import TeamSchema

router = APIRouter()

@router.post("/teams")
async def create_team(team: TeamSchema, db: Session = Depends()):
    existing_team = db.query(Team).filter_by(name=team.name).first()
    if existing_team:
        raise HTTPException(status_code=400, detail="Team already exists")
    new_team = Team(name=team.name)
    db.add(new_team)
    db.commit()
    return {"message": "Team created successfully"}

@router.get("/teams")
async def get_teams(db: Session = Depends()):
    teams = db.query(Team).all()
    return [{"id": team.id, "name": team.name} for team in teams]