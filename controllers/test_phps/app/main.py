from fastapi import FastAPI
from routers.user import router as user_router
from routers.team import router as team_router

app = FastAPI()

app.include_router(user_router)
app.include_router(team_router)